<form>
    <div>
        E-mail: <input name="email" type="text">
    </div>
    <div>
        Senha: <input name="password" type="text">
    </div>
    <div>
        <button>Enviar</button>
    </div>
    <div class="response">

    </div>
</form>

<script type="text/javascript" async>
    const formData = new FormData(document.querySelector("form"));

    const options = {
        method: 'POST',
        body : document.querySelector("form")
    };

    const url = `<?= url("api/user/login");?>`;

    async function request (url, options) {
        try {
            const response = await fetch (url, options);
            const data = await response.json();
            return data;
        } catch (err) {
            console.error(err);
            return {
                type: "error",
                message: err.message
            };
        }
    }

    document.querySelector("form").addEventListener("submit", async (e) => {
        e.preventDefault();
        const resp = await request(url, options);
        console.log(resp);
    });

</script>
