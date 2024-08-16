<section class=forum>
<form     
hx-post="/sign-up"
    hx-trigger="submit"
    enctype="multipart/form-data">

        <h2>Create an account</h2>

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="text" name="pass" required>

        <input type="submit" value="Add">
    </form>
<h2>Already have an account?</h2>
<p class=button><a href="/login" role="button">Log in </a></p>
</section>
