<div class='board_view'>
	<dl>
		<dt>제목</dt>
		<dd><?=$subject?></dd>
	</dl>
	<dl>
		<dt>글쓴이</dt>
		<dd>
			<?=$poster?> / <?=date("Y.m.d", strtotime($regDt))?>
		</dd>
	</dl>
	<dl>
		<dt>내용</dt>
		<dd><?=nl2br($contents)?></dd>
	</dl>
</div>

<div class='btns'>
	<a href='?dir=board&file=write'>글쓰기</a>
	<a href='?dir=board&file=update&idx=<?=$idx?>'>글수정</a>
	<a href='?dir=board&file=indb&mode=delete&idx=<?=$idx?>' target='ifrmHidden' onclick="return confirm('정말 삭제하시겠습니까?');">글삭제</a>
	<a href='?dir=board&file=list'>글목록</a>
</div>