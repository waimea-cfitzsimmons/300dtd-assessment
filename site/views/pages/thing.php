<section>

    <article>

        <h1>Thing list</h1>

        <p>list of Thingamabob's

        <ul>
        <section id="things">

<div
    id="thing-list"
    hx-get="/thing-list"
    hx-trigger="load"
></div>

<div id="thing-info">
    <h2>Select a Thing</h2>
    <p>To find out about a thing, select it from the list of things...</p>
</div>

</section>
        </ul>

    </article>

    <article>
    <form     
hx-post="/add-thing"
    hx-trigger="submit"
    enctype="multipart/form-data">

        <h2>Add a New Thing</h2>

        <label>Title</label>
        <input type="text" name="name" required>

        <label>Description</label>
        <input type="text" name="desc" required>

        <input type="submit" value="Add">
    </form>
</article>

</section>



