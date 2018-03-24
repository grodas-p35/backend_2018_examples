<select>
<?php for ($i = 0; $i <= 12; $i++) { ?>
	<option value="<?= $i; ?>"><?= $i; ?></option>
<?php } ?>
</select>

<select>
<?php $i = 0;
for (; $i < 12;) { ?>
	<option value="<?php echo ++$i; ?>"><?= $i; ?></option>
<?php } ?>
</select>