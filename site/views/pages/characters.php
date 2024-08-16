<?php
    $showCharacter = isset($id);
    consoleLog($showCharacter);
?>

<section id="char_list">
    <article>
        <ul>
            <div id="list" hx-get="/character-list" hx-trigger="load"></div>
        </ul>
    </article>

    <article>
        <div id="info">
            <?php if ($showCharacter): ?>
                <div hx-trigger="load" hx-get="/character/<?= $id ?>" hx-target="#info"></div>
            <?php else: ?>
                <h2>Select a character</h2>
                <p>To find out information about the character</p>
            <?php endif ?>
        </div>
    </article>
</section>


