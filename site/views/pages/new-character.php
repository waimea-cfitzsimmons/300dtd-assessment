<section>
<form     
hx-post="/add-character"
    hx-trigger="submit"
    enctype="multipart/form-data">

        <h2>Add a New Character</h2>

        <label>Title</label>
        <input type="text" name="name" required>

        <label>Description</label>
        <input type="text" name="desc" required>

        <label>health</label>
        <input type="number" name="health" min="0" max = "100" required>

        <label>strength</label>
        <input type="number" name="strength" min="0" max = "20" required>

        <label>dexterity</label>
        <input type="number" name="dexterity" min="0" max = "20" required>

        <label>charisma</label>
        <input type="number" name="charisma" min="0" max = "20"required>

        <label>intelligence</label>
        <input type="number" name="intelligence" min="0" max = "20" required>

        <label>wisdom</label>
        <input type="number" name="wisdom" min="0" max = "20" required>

        <label>constitution</label>
        <input type="number" name="constitution" min="0" max = "20" required>

        <input name="creator" type="hidden" value="<?= $userId ?>">

        <input type="submit" value="Add">
    </form>
</section>