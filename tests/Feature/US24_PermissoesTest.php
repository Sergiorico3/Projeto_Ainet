<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class US24_PermissoesTest extends USTestBase
{
    protected $userToSimulate;
    protected function setUp(): void
    {
        parent::setUp();
        $this->seedNormalUsers();
        $this->seedDirecaoUser();
        $this->userToSimulate = $this->normalUser;
    }

    public function testGetSociosEditAcessivelDirecao()
    {
        $this->actingAs($this->direcaoUser)->get("/socios/". $this->normalUser->id.'/edit')
                ->assertAuthorized('GET', "/socios/". $this->normalUser->id.'/edit', 'Um sócio da direção não consegue ver os dados de perfil de um sócio!');
    }

    public function testGetSociosEditInacessivelOutros()
    {
        $this->actingAs($this->normalUser2)->get("/socios/". $this->normalUser->id.'/edit')
                ->assertUnauthorized('GET', "/socios/". $this->normalUser->id.'/edit', 'Um sócio "normal" consegue ver os dados de perfil de outro sócio!');
    }

    public function testProtecaoAlterarSocioDirecao()
    {
        $newdata = ["nome_informal" => "Valor Válido"];
        $requestData = array_merge($this->getRequestArrayFromUser($this->normalUser), $newdata);
        $this->actingAs($this->direcaoUser)->put('/socios/'. $this->normalUser->id, $requestData)
            ->assertAuthorized('PUT', "/socios/". $this->normalUser->id, 'Um sócio da direção não consegue alterar os dados de perfil de um sócio!');
    }

    public function testProtecaoAlterarSocioOutros()
    {
        $newdata = ["nome_informal" => "Valor Válido"];
        $requestData = array_merge($this->getRequestArrayFromUser($this->normalUser), $newdata);
        $this->actingAs($this->normalUser2)->put('/socios/'. $this->normalUser->id, $requestData)
            ->assertUnauthorized('PUT', "/socios/". $this->normalUser->id, 'Um sócio "normal" consegue alterar os dados de perfil de outro sócio!');
    }
}
