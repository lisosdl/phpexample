<div class='board_list'>
	<ul>
	<?php foreach ($list as $li) : ?>
		<li>
			<a href='?dir=board&file=view&idx=<?=$li['idx']?>' class='subject'>
				<?=$li['subject']?>
			</a>
			<div class='post_info'>
				<?=$li['poster']?> / <?=date("Y.m.d", strtotime($li['regDt']))?>
			</div>
		</li>
	<?php endforeach; ?>
	</ul>
</div>

<div class='btns'>
	<a href='?dir=board&file=write'>글작성</a>
</div>