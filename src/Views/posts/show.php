<h1><?php echo htmlspecialchars($post['title']) ?></h1>
<p>
    <img src="uploads/<?php echo htmlspecialchars($post['image']) ?>">
</p>
<p>
    <?php echo htmlspecialchars($post['text']) ?>
</p>
<i>Последние изменения: <?php echo htmlspecialchars($post['updated_at']) ?></i>