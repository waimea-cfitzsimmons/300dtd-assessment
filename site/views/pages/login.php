<form
    hx-post="/process-login"
    hx-trigger="submit"
>
    <label>username</label>
    <input name="user" type="text" required>

    <label>password</label>
    <input name="pass" type="password" required>

    <input type="submit" value="login">
</form>