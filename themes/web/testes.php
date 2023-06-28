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
</form>

<script type="text/javascript" async>
    const formData = new FormData(document.querySelector("form"));
    const options = {
        method: 'POST',
        body : document.querySelector("form")
    };

    const url = `<?= url("api/user/login");?>`;

    request(url, {
        method: 'POST',
        body: document.querySelector("form"),
    })


    async function request (url, options={}) {
        if (options.body) {
            options.body = new FormData(options.body);
        }
        // if (options.query) {
        //     url += "?" + new URLSearchParams(options.query).toString();
        // }
        try {
            const response = await fetch(url, options);
            const data = await response.json();
            return data;
        } catch (err) {
            console.error(err);
            return {
                error: true,
                message: err.message
            };
        }

        // return new Promise( resolve => {
        //     fetch(url, options).then(response => {
        //         response.json().then(data => {
        //             console.log(data);
        //             resolve(data);
        //         });
        //     }).catch(err => {
        //         console.log(err);
        //     });
        // });
    }

    document.querySelector("form").addEventListener("submit", async (e) => {
        e.preventDefault();
        const resp = await request(url, options)
        console.log(resp);
    });

</script>
