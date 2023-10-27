let apiURL; 

if (window.location.pathname.includes('wamp64/www')) {
    apiURL = 'http://localhost/iMangerMieux/backend';
} else {
    apiURL = 'http://localhost:8888/iMangerMieux/backend';
}

