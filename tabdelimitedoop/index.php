<?php
include 'ArticleFactory.php';
include 'Article.php';

$articleFactory = new ArticleFactory('articles.csv');
$articles = $articleFactory->sortBy($_GET['sortcolumn'])->get();

?><!DOCTYPE html>
<html>
<head>
    <title>Debug Test</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<h1>Tab delimited data, OOP</h1>

<table cellspacing="0" cellpadding="3" border="1" bordercolor="#CCCCCC">
    <tr>
        <th><a href="?sortcolumn=id">ID</a></th>
        <th><a href="?sortcolumn=title">Title</a></th>
        <th><a href="?sortcolumn=description">Description</a></th>
        <th><a href="?sortcolumn=price">Price</a></th>
    </tr>

    <?php foreach ($articles as $article) { ?>
        <tr>
            <td><?php echo $article->getId()?></td>
            <td><?php echo $article->getTitle()?></td>
            <td><?php echo $article->getDescription()?></td>
            <td><?php echo $article->getPrice()?></td>
        </tr>
    <?php } ?>
</table>