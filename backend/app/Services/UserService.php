<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class UserService
{

    public function getUsers()
    {
        try {
            return User::paginate();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getUser(User $user)
    {
        try {
            return $user;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function createUser(array $request)
    {
        try {
            // $name['first_name'] = explode(" ", $request['name'])[0];
            // $name['last_name'] = explode(" ", $request['name'])[1];

            if(isset($request['photo'])){
                $relativePath = $this->saveImage($request['photo']);
                $request['photo'] = $relativePath;
            }

            $user = User::create(
                [
                    'role' => $request['role'],
                    // 'first_name' => $name['first_name'],
                    // 'last_name' => $name['last_name'],
                    'first_name' => $request['first_name'],
                    'last_name' => $request['last_name'],
                    'email' => $request['email'],
                    'password' => bcrypt($request['password']),
                    "birthdate" => $request['birthdate'],
                    "identification" => $request['identification'],
                    "phone" => $request['phone'],
                    "photo" => $request['photo'],
                    "city_id" => $request['city_id'],
                ]
            );
            return $user;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function updateUser(array $request, User $user)
    {
        try {
            if(isset($request['photo'])){
                $relativePath = $this->saveImage($request['photo']);
                $request['photo'] = $relativePath;
            }
    
            if($user->photo){
                $absolutePath = public_path($user->photo);
                File::delete($absolutePath);
            }

            $user->update($request);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function deleteUser(User $user)
    {
        try {
            $user->delete();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function saveImage($image)
    {
        if(preg_match('/^data:image\/(\w+);base64,/', $image, $type)){
            $image = substr($image, strpos($image, ',')+1);
            $type = strtolower($type[1]);

            if(!in_array($type, ['jpg', 'jpeg', 'png', 'gif'])){
                throw new \Exception('Tipo de imagen inválido');
            }
            
            $image = str_replace(' ', '+', $image);
            $image = base64_decode($image);

            if($image === false){
                throw new \Exception('Conversión de imagen base64 falló');
            }

            $dir = 'images/';
            $file = Str::random() . '.' . $type;
            $relativePath = $dir . $file;
            $absolutePath = public_path($dir);
            if(!File::exists($absolutePath)){
                File::makeDirectory($absolutePath, 0755, true);
            }
            file_put_contents($relativePath, $image); //o $absolutePath
            
            return $relativePath;
        }
        else{
            throw new \Exception('Uri no coincide con imagen en base 64');
        }
    }

}