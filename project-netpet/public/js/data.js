window.onload = async () => {
    try {
        
        let response = await fetch('https://api.ipify.org?format=json')
        let data = await response.json()
        let client_ip = data.ip
        
        let send = await fetch(`/ip-data?ip=${client_ip}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        })

        let clients_data = await send.json()

        let table_body = document.getElementById('client-data')

        let html_view = ''

        for (let [key, value] of Object.entries(clients_data)) {
            html_view += `<tr>
            <td>${key}</td>
            <td>${value ? value : 'N/A'}</td>
            </tr>`
        }

        table_body.innerHTML += html_view

    } catch (error) {
        console.log(error)
    }
}

(() => {
    let h2 = document.getElementById('browser')
    h2.innerHTML = `Browser: ${clientInformation.userAgent}`
})()