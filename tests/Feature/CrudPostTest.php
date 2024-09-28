<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CrudPostTest extends TestCase
{
    use RefreshDatabase;
    // penyebab database ke reset wae

    public function test_admin_can_store_a_post(): void
    {
        // Arrange: Create a user and log them in
        $user = User::factory()->create();
        $this->actingAs($user);

        // Simulate an image file upload
        Storage::fake('public'); // Fake the storage

        // Act: Make a POST request to the store method
        $response = $this->post('/dashboard/posts', [
            'title' => 'Test Post',
            'slug' => 'test-post',
            'image' => UploadedFile::fake()->image('test-image.jpg'), // Fake image
            'category_id' => 1, // Assuming you have a category with ID 1
            'body' => 'This is the body of the test post.',
        ]);

        // Assert: Check the response and database
        $response->assertRedirect('/dashboard/posts');
        $response->assertSessionHas('success', 'New post has been added!');
        
        // Verify the post was created in the database
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
            'slug' => 'test-post',
            'body' => 'This is the body of the test post.',
            'user_id' => $user->id,
        ]);

        // Check if the image was stored
        Storage::disk('public')->assertExists('post-images/test-image.jpg');
    }

    public function test_store_fails_with_invalid_data(): void
    {
        // Arrange: Create a user and log them in
        $user = User::factory()->create();
        $this->actingAs($user);

        // Act: Make a POST request with invalid data
        $response = $this->post('/dashboard/posts', [
            // Missing required fields
        ]);

        // Assert: Check for validation errors
        $response->assertSessionHasErrors(['title', 'slug', 'category_id', 'body']);
    }
}
