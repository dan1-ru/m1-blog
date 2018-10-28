<?php if(isset($post)) : ?>
<form id="postForm" enctype="multipart/form-data" action="posts/update?id=<?php echo $post['id'] ?>" method="POST">
<?php else: ?>
<form id="postForm" enctype="multipart/form-data" action="posts/store" method="POST">
<form>
<?php endif; ?>
  <div class="form-group">
    <label for="titleInput">Заголовок</label>
    <input 
      type="text" 
      name="title" 
      class="form-control" 
      id="titleInput" 
      value="<?php echo isset($post) ? $post['title'] : '' ?>" 
      placeholder="Однажды я встретил...">
  </div>
  <div class="form-group">
    <label for="textInput">Текст статьи</label>
    <textarea class="form-control" rows="4" name="text" id="textInput"><?php echo isset($post) ? $post['text'] : '' ?></textarea>
  </div>
  <div class="form-group">
    <label for="imageInput">Картинка</label>
    <input type="file" name="image" class="form-control-file" id="imageInput">
  </div>
  <div class="form-group">
    <?php if(isset($post)) : ?>
      <input type="submit" class="btn btn-primary" value="Обновить пост">
    <?php else : ?>
      <input type="submit" class="btn btn-primary" value="Добавить пост">
    <?php endif; ?>
  </div>
</form>