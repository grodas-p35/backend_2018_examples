<?php

$files = ['e1', 'bc-s1e10', 'esl203'];

$data = [];

foreach ($files as $file) {
  $data[$file] = load_json_file($resources_path . $file . '.json');
}

?>

Условие задачи:
<ol>
  <li>Если у подкаста podcast есть английское название (titleEn), используем его, иначе - русское(titleRu)</li>
  <li>Берем категорию подкаста с podcast.category_name</li>
  <li>Обработка значения paragraphs
    <ul>
      <li>Если значение paragraphs == null как контент используем podcast.post_content</li>
      <li>Иначе идем по параграфам с помощью array_map()
        <ol>
          <li>В параграфах есть массив sentences. Проходим по нему с помощью array_reduce()
            <ol>
              <li>соберите значение с translation в одно тесктовое поле</li>
              <li>высчитайте общую продолжительность параграфа исользуя значения start и end в теле sentence</li>
            </ol>
          </li>
          <li>Посчитайте общую продолжительность подкаста</li>
        </ol>
      </li>
    </ul>
  </li>
  <li>Собранная информация должна корректно отобразиться в конечном шаблоне разметки </li>
</ol>

Useful links
<ol>
  <li><a href="//php.net/manual/en/function.array-map.php">array_map()</a></li>
  <li><a href="//php.net/manual/en/function.array-reduce.php">array_reduce()</a></li>
</ol>
<br>
<?php 
 //print_r($data); 
 
 $data = array_map(function ($podcast) {
   $result = [];


   $result['title'] = 'Load real post title';
   $result['total_duration'] = 'Calculate me';

    //fill required values here. Just example. Replace with your code
   $result['post_name'] = 'I need only this ' . $podcast['podcast']['post_name'];
   
   $fake_sentences = [
     ['content' => 'Load', 'duration' => 3],
     ['content' => 'real', 'duration' => 5],
     ['content' => 'post', 'duration' => 8],
     ['content' => 'content', 'duration' => 2],
   ];
   
   $paragraph = array_reduce($fake_sentences, function ($carry, $sentence) {
     $carry['content'] .= ' ' .$sentence['content'];
     $carry['duration'] += $sentence['duration'];
     return $carry;
   }, ['content' => '', 'duration' => 0]);
   
   $result['paragraphs'][] = $paragraph;
   return $result;
 }, $data);

foreach ($data as $filename => $podcast) { ?>
  <div class="podcast-filename">Filename: <?= $filename; ?></div>
  <div class="podcast-title">Title: <?= $podcast['title']; ?></div>
  <div class="podcast-content">
    <?php if (isset($podcast['paragraphs'])) {
      foreach ($podcast['paragraphs'] as $paragraph) { ?>
        <div class="podcast-paragraph-content"><?= $paragraph['content']; ?></div>
        <div class="podcast-paragraph-duration">Duration: <?= $paragraph['duration']; ?></div>
      <?php }
    } else {
      echo $podcast['content'];
    } ?>
  </div>
  <?php if (isset($podcast['total_duration'])) { ?>
    <div class="podcast-total-duration">Total duration: <?= $podcast['total_duration']; ?></div>
  <?php } ?>
  <br>
<?php } ?>
