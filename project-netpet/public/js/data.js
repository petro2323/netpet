window.onload = async () => {
    try {
        
        let response = await fetch('https://api.ipify.org?format=json')
        let data = await response.json()
        let client_ip = data.ip
        
        let send = await fetch('/ip-data', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ ip: client_ip })
        })

        let clients_data = await send.json()

        let table_body = document.getElementById('client-data')

        let data_map = {
            'Ip Address': client_ip,
            'Continent': clients_data.continent_name,
            'Country': clients_data.country_name,
            'Country Code': clients_data.country_code3,
            'City': clients_data.city,
            'Zipcode': clients_data.zipcode,
            'Organization': clients_data.organization,
            'Connection Type': clients_data.connection_type,
            'Currency': clients_data.currency.code
        }

        let html_view = ''

        for (let [key, value] of Object.entries(data_map)) {
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