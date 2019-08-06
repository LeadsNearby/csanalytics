
(function() {
    const apiBase = 'https://apicfa.convirza.com';
    const apiUserName = 'devops@leadsnearby.com';
    const apiPassword = 'EEx99GnDppECGwHS';

    fetch(apiBase + '/oauth/token', {
        method: 'POST',
        headers: {
            // 'Accept': 'application/json',
            //'Content-Type': 'application/json'
        },
        body: {
            "grant_type":"password",
            "client_id":"system",
            "client_secret": "f558ba166258089b2ef322c340554c",
            "username":"devops@leadsnearby.com",
            "password":"EEx99GnDppECGwHS"
        },
        
        mode: "cors"

    }).then(function(response) {
        console.log(response);
        //return response.json();
    });
    
})();