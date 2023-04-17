<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class DnsInfoController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'domain' => 'required|string|max:100',
            'dns_server' => 'required|string|max:100'
        ]);

        $domain = $request->input('domain');
        $dnsServer = $request->input('dns_server');

        exec("dig +short @$dnsServer $domain A", $output, $resultCode);
        // $process = new Process(['dig', '+short', "@$dnsServer", $domain, "A"]);
        // $process->run();

        if ($resultCode > 0) {
            // 🍰 Tip: Exit earlier
            return [
                'success' => false,
                'code' => collect($output)->filter()
            ];
        }

        return [
            'success' => true,
            'ips' => collect($output)->filter()
        ];
    }
}
