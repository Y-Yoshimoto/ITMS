// Zabbis Media Webhook
Zabbix.Log(4, 'webhook request value=' + value);

// Make Senddata
params = JSON.parse(value);
Senddata = {};
Senddata.Subject = params.Subject;
Senddata.Message = params.Message;
Senddata.Service = params.Service;
Senddata.To = params.To;

//Request
var req = new CurlHttpRequest();
//req.AddHeader('Content-Type: application/x-www-form-urlencoded');
req.AddHeader('Content-Type: application/json; charset=UTF-8');
req.Post('http://itms_docker_nginx_1/itms/addAlert/index.php',
            JSON.stringify({ Senddata })
);

Zabbix.Log(4, 'response code: ' + req.Status());
return JSON.stringify({
    'tags': {
        'endpoint': 'itms'
    }
});
