<div class='container'>
    <div class="text-center display-4 mb-3">
        Tag selection - <b><?= strtoupper($_GET['tag']) ?></b>
    </div>
    <div class='row'>
        <div class='col-lg-12'>

            <?php
            $out = '';
            foreach ($articleTag as $article) {
                $out .= "<div class='text-center'><img src='/images/images_animals/{$article['pictures']}' alt='{$article['title']}' class='w-50 rounded'></div>";
                $out .= "<h2>{$article['title']}</h2>";
                $out .= "<p>{$article['summary']}</p>";
                $out .= '<p><a href="/main/article-cat?id=' . $article['id'] . '">Read more...</a></p>';
                $out .= '<hr>';
            }
            echo $out;
            ?>
        </div>

        <hr>

        <div class='row'>
            <div class="col-lg-12 text-center">
                <?
                if (!empty($tagAnimal)) {
                    foreach ($tagAnimal as $tag) {
                        echo "<a class='badge badge-info p-2 m-1' href='/main/tag-selection?tag={$tag['tag']}' class='tag'>{$tag['tag']}</a>";
                    }
                }
                ?>
            </div>
        </div>

    </div>
</div>
