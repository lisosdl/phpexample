<div class='board_view'>
	<dl>
		<dt>제목</dt>
		<dd><?=$subject?></dd>
	</dl>
	<dl>
		<dt>작성자</dt>
		<dd><?=$poster?> / <?=$regDt?></dd>
	</dl>
	<dl>
		<dt>내용</dt>
		<dd>
			<?=nl2br($contents)?>
		</dd>
	</dl>
</div>

<div class='btns'>
	<a href='?folder=board&file=write'>글 작성</a>
	<a href='?folder=board&file=update&idx=<?=$idx?>'>글 수정</a>
	<a href='?folder=board&file=list'>글 목록</a>
	<a href='?folder=board&file=indb&mode=delete&idx=<?=$idx?>' target='ifrmHidden' onclick="return confirm('정말 삭제하시겠습니까?');">글 삭제</a>
</div>