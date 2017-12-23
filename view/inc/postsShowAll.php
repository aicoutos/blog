<h2>Posts</h2>
<?php
if (isset($posts) && is_array($posts) && count($posts)>0) {
    print '<ul>';
    foreach ($posts as $post) {
        $postRead='/posts/'.$post['slug'].'/'.$post['id'];
        $postUpdate=$postRead.'?update';
        $postDelete='javascript:postDelete(\''.$post['id'].'\');';
        print '<li>';
        print '<a href="'.$postUpdate.'">Editar</a> |';
        print ' <a class="postDeleteLink" href="'.$postDelete.'">Apagar</a> |';
        if ($post['online']) {
            print ' <b class="green">ON</b> |';
        } else {
            print ' <b class="red">OFF</b> |';
        }
        print ' <a href="'.$postRead.'">'.$post['title'].'</a>';
        print '</li>'.PHP_EOL;
    }
    print '</ul>';
} else {
    print 'Nenhum post encontrado';
    var_dump($posts);
}
?>
<script type="text/javascript">
function postDelete(id){
    var url='/posts/'+id+'?delete';
    if(confirm("Deseja realmente apagar o post "+id+"?")){
        $.post(url, function(data, status){
            window.location.href = '/posts';
        });
    }
}
</script>
