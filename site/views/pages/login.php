<section class=forum>
    
    <form hx-post="/process-login" hx-trigger="submit">
        <h2>Login to your account</h2>
        <label>username</label>
        <input name="user" type="text" required>
        <label>password</label>
        <input name="pass" type="password" required>
        <input type="submit" value="login">
    </form>

    <h2>Dont have an account?</h2>

    <p class=button><a href="/signup" role="button">Sign Up </a></p>
</section>