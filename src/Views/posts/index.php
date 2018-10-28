<h1>Список постов</h1>
<div class="row">
<?php foreach($posts as $post) : ?>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <?php echo htmlspecialchars($post['title']) ?>
            </div>
            
            <?php if($post['image']) : ?>
            <img class="card-img-top responsive" src="uploads/<?php echo $post['image'] ?>">
            <?php endif ?>

            <div class="card-body">
                <p class="card-text"><?php echo htmlspecialchars($post['text']) ?></p>
                <a class="btn btn-primary" href="#posts/edit?id=<?php echo $post['id'] ?>">Редактировать</a>
                <a class="btn btn-success" href="#posts/show?id=<?php echo $post['id'] ?>">Подробнее</a>
                <a class="btn btn-danger" href="#posts/destroy?id=<?php echo $post['id'] ?>" onclick="return confirm('Вы уверены, что хотите удалить этот пост?')" title="Удалить запись">&times;</a>
            </div>
        </div>  
    </div>
<?php endforeach ?>
</div>