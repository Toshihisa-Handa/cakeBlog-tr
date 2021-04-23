<h1><?= h($article->title) ?></h1>
<p><?= h($article->body) ?></p>
<p><small>Created:<?= $article->created->format('y/m/d') ?></small></p>