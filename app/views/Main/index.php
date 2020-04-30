<div class="jumbotron jumbotron-fluid p-2">
    <div class="container ">
        <h1 class="display-4">Mustache, paws and tail</h1>
        <p class="lead">Fluffy purring - the best way to calm nerves</p>
    </div>
</div>

<div class="container">
    <div class='row'>
        <div class='col-lg-9'>
            <?
            if (!empty($cardAnimal)) {
                $out = "<div class='row'>";
                foreach ($cardAnimal as $card) {
                    $out .= "<div class='col-lg-4 col-md-6'>";
                    $out .= "<div class='card'>";
                    $out .= "<img src='images/images_animals/{$card['pictures']}' class='card-img-top' alt={$card['title']}> ";
                    $out .= "<div class='card-body'>";
                    $out .= "<h5 class='card-title'>{$card['title']}</h5>";
                    $out .= "<p class='card-text'>" . mb_strimwidth($card['summary'], 0, 100, "...") . "</p>";
                    $out .= "<a class='btn btn-primary' href='article/" . $card['id'] . "'>Read more...</a>";
                    $out .= '</div>';
                    $out .= '</div>';
                    $out .= '</div>';
                }
                $out .= '</div>';
                echo $out;
            }
            ?>
        </div>

        <div class='col-lg-3'>
            <?
            if (!empty($catAnimal)) {
                $out = '<div class="list-group">';
                foreach ($catAnimal as $category) {
                    $out .= '<a class="list-group-item list-group-item-action" href="/cat/' . $category['id'] . '">' . $category['description'] . '</a>';
                }
                $out .= '</div>';
                echo $out;
            }
            ?>
        </div>
    </div>

    <hr>

    <div class='row'>
        <div class="col-lg-12 text-center">
            <?
            if (!empty($tagAnimal)) {
                foreach ($tagAnimal as $tag) {
                    echo "<a class='badge badge-info p-2 m-1' href='tag.php?tag={$tag['tag']}' class='tag'>{$tag['tag']}</a>";
                }
            }
            ?>
        </div>
    </div>

    <hr>

    <?php echo $pagination ?>

</div>