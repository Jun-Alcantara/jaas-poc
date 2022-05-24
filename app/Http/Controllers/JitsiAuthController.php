<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Jose\Component\Core\AlgorithmManager;
use Jose\Component\Core\JWK;
use Jose\Component\Signature\Algorithm\RS256;
use Jose\Component\Signature\JWSBuilder;
use Jose\Component\KeyManagement\JWKFactory;
use Jose\Component\Signature\Serializer\CompactSerializer;

class JitsiAuthController extends Controller
{
    /**
     * Lifespan of jwt in hours
     */
    protected $jwt_lifespan = 2;

    public function authenticationForm()
    {
        return "Form";
    }

    /**
     * Create Json Web Token
     */
    public function authenticate(Request $request)
    {
        $jwk = JWKFactory::createFromKeyFile(storage_path('jaasauth.key'));

        $algorithm = new AlgorithmManager([
            new RS256()
        ]);

        $jwsBuilder = new JWSBuilder($algorithm);

        $payload = json_encode([
            'iss' => 'chat',
            'aud' => 'jitsi',
            'exp' => now()->addHours( $this->jwt_lifespan )->timestamp,
            'nbf' => now()->timestamp,
            'room' => '*',
            'sub' => 'vpaas-magic-cookie-24c3220c2b2548d89c2275c54db45d11',
            'context' => [
                'user' => [
                    'moderator' => false,
                    'email' => 'junalcantara.dev@gmail.com',
                    'name' => 'Generated From Controller',
                    'avatar' => '',
                    'id' => 'user-001'
                ],
                'features' => [
                    'recording' => false,
                    'livestreaming' => false,
                    'transcription' => false,
                    'outbound-call' => false
                ]
            ]
        ]);

        $jws = $jwsBuilder
            ->create()
            ->withPayload($payload)
            ->addSignature($jwk, [
                'alg' => 'RS256',
                'kid' => 'vpaas-magic-cookie-24c3220c2b2548d89c2275c54db45d11/2ed706',
                'typ' => 'JWT'
            ])
            ->build();

        $serializer = new CompactSerializer();
        $token = $serializer->serialize($jws, 0);

        return view('jitsi/room', compact('token'));
    }
}
