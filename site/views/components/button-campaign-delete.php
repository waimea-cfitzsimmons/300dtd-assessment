

<h2>Delete User Record via DELETE</h2>

<p>This button will submit a DELETE request...</p>

<p>
    <button
        hx-delete="/campaign/<?= $campaign['id'] ?>"
        hx-target="#request-result"
        hx-confirm="Really delete this campaign?"
        class="danger"
    >
        Delete User
    
    </button>
</p>

<p><em>Note: The user ID (<?= $id ?>) is sent as a URL parameter...</em></p>

<pre><code>hx-delete='/user/<?= $id ?>'</code></pre>
