<?php //Vars
$main_portfolio_cases_IDs = get_field('main_portfolio_cases');
if (!empty($main_portfolio_cases_IDs)) {
    $cases = [];
    foreach ($main_portfolio_cases_IDs as $id) {
        $mainImage = get_field('case_main_image', $id);
        $tagsObjects = get_the_tags($id);
        if (!empty($tagsObjects)) {
            $tagsList = [];
            foreach ($tagsObjects as $tag) {
                $tagsList[$tag->term_id] = $tag->name;
            }
        }
        $caseTitle = get_the_title($id);
        $caseDescription = get_field('case_short_description', $id);
        $link = get_the_permalink($id);
        $cases[$id] = [
            'image' => [
                'src'  => $mainImage['sizes']['large'],
                'alt'   => $mainImage['alt'],
            ],
            'tags'  => $tagsList,
            'title' => $caseTitle,
            'description' => $caseDescription,
            'link'  => $link,
        ];
    }
}
?>

<?php if (!empty($cases)) : ?>
    <div class="container">
        <div class="main-cases">
            <?php foreach ($cases as $case) : ?>
                <a href="<?= $case['link'] ?>" class="case">
                    <?php if (!empty($case['image'])) : ?>
                        <div class="case__img-wrap">
                            <img src="<?= $case['image']['src'] ?>" alt="<?= $case['image']['alt'] ?>">
                        </div>
                    <?php endif ?>
                    <div class="case__caption">
                        <?php if (!empty($case['tags'])) : ?>
                            <div class="case__tags">
                                <?php foreach ($case['tags'] as $tag) : ?>
                                    <span class="tag"><?= $tag ?></span>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>
                        <h2 class="case__title"><?= $case['title'] ?></h2>
                        <?php if ($case['description']) : ?>
                            <p class="case__description text-darker"><?= $case['description'] ?></p>
                        <?php endif ?>
                        <span class="brand-btn btn-transparent waves-effect waves-teal">Read Case Study</span>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    </div>
<?php endif ?>