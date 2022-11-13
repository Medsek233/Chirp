<?php


test('sendEmail', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
