<?php

it('returns a redirected response', function () {
    $response = $this->get('/');

    $response->assertStatus(302);
});
