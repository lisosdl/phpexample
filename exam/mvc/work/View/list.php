<div class='board_list'>
	<ul>
	<?php foreach ($list as $li) : ?>
		<li>
			<a href='?folder=board&file=view&idx=<?=$li['idx']?>' class='subject'>
				<?=$li['subject']?>
			</a>
			<div class='post_info'>
				<?=$li['poster']?> / <?=date("Y.m.d", strtotime($li['regDt']))?>
			</div>
		</li>
	<?php endforeach; ?>
	</ul>
	<div class='btns'>
		<a href='write'>글 작성</a>
	</div>
</div>