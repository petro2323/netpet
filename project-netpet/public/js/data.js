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

        let tableBody = document.getElementById('client-data')

        let html_view = `<tr>
        <td>ip_address</td>
        <td>${client_ip}</td>
        </tr>

        <tr>
        <td>continent_name</td>
        <td>${clients_data.continent_name}</td>
        </tr>

        <tr>
        <td>country_name</td>
        <td>${clients_data.country_name}</td>
        </tr>

        <tr>
        <td>country_code</td>
        <td>${clients_data.country_code3}</td>
        </tr> 
        
        <tr>
        <td>city</td>
        <td>${clients_data.city}</td>
        </tr>

        <tr>
        <td>zipcode</td>
        <td>${clients_data.zipcode}</td>
        </tr>

        <tr>
        <td>internet_service_provider</td>
        <td>${clients_data.organization}</td>
        </tr>

        <tr>
        <td>connection_type</td>
        <td>${clients_data.connection_type}</td>
        </tr>

        <tr>
        <td>currency</td>
        <td>${clients_data.currency.code}</td>
        </tr>`

        tableBody.innerHTML += html_view

    } catch (error) {
        console.log(error)
    }
}

(() => {
    let h2 = document.getElementById('browser')
    h2.innerHTML = `Browser: ${clientInformation.userAgent}`
})()