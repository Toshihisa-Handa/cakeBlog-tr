<h1>ブログ記事</h1>
<table>
    <tr>
        <th>Id</th>
        <th>タイトル</th>
        <th>作成日時</th>
    </tr>
    <?php foreach ($articles as $article) : ?>
        <tr>
            <td><?= $article->id ?></td>
            <td>
                <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
            </td>
            <td>
                <?= $article->created->format('y/m/d'); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>