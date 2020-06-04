<?php //Vars
$all_cases_IDs = get_field('all_cases');
if (!empty($all_cases_IDs)) {
    $cases = [];
    foreach ($all_cases_IDs as $id) {
        $icon = get_field('case_icon', $id);
        $caseTitle = get_the_title($id);
        $caseDescription = get_field('case_short_description', $id);
        $link = get_the_permalink($id);
        $cases[$id] = [
            'icon'  => $icon['sizes']['medium_large'],
            'title' => $caseTitle,
            'description' => $caseDescription,
            'link'  => $link,
        ];
    }
}
?>

<?php if (!empty($cases)) : ?>
    <div class="container">
        <div class="all-cases">
            <?php foreach ($cases as $case) : ?>
                <a href="<?= $case['link'] ?>" class="case">
                    <?php if (!empty($case['icon'])) : ?>
                        <div class="case__img-wrap">
                            <img src="<?= $case['icon'] ?>">
                        </div>
                    <?php endif ?>
                    <div class="case__caption">
                        <h3 class="case__title"><?= $case['title'] ?></h3>
                        <?php if ($case['description']) : ?>
                            <p class="case__description text-lighter"><?= $case['description'] ?></p>
                        <?php endif ?>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    </div>
<?php endif ?>