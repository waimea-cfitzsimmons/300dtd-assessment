<article>
    <form     
    hx-post="/add-campaign"
    hx-trigger="submit"
    enctype="multipart/form-data">

        <h2>Start a new campaign</h2>

        <label>Title</label>
        <input type="text" name="title" required>

        <label>Description</label>
        <input type="text" name="desc" required>

        <input name="creator" type="hidden" value="<?= $userId ?>">

        <input type="submit" value="Add">
    </form>
</article>
