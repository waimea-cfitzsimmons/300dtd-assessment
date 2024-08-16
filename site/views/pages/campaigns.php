<?php
    $showCampaign = isset($id);
    consoleLog($showCampaign);
?>

<section
    id="campaign_page">

    
    <article>
        <h1>Campaign List</h1>
        <p>List of campaigns
        <ul>
            <div
                id="list"
                hx-get="/campaign-list"
                hx-trigger="load"
            ></div>
            <p><a href="/new-campaign" role="button">Start Campaign</a></p>
        </ul>
    </article>

    <article>
            <div id="info">
                <?php if ($showCampaign): ?>
                    <div hx-trigger="load" hx-get="/campaign/<?= $id ?>" hx-target="#info"></div> 
                <?php else: ?>
                    <h2>Select a campaign</h2>
                    <p>To find out information about the campaign</p>
                <?php endif ?>
            </div>
    </article>

    <article>
        <div id="extra">
            <h2>Extra information</h2>
            <p>Extra information will appear here</p>
        </div>
    </article>

</section>
