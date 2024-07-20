<?php

namespace App\Repositories;
use App\Models\Contact;
use Illuminate\Http\Request;
use Exception;
class ContactRepository
{
    public function get(Request $request, $paginate = 50, $sortOrder = 'Asc', $orderBy = 'id')
    {
        $query = Contact::query();

        if ($request->title) {
            $query->where('name', 'LIKE', "%{$request->title}%");
        }

        $query->orderBy($orderBy, $sortOrder);

        return $paginate != false ? $query->paginate($paginate) : $query->get();
    }
  
    
    public function store($data)
    {
        
        try {
            return Contact::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'brandedPartners' => $data['brandPartners'],
                'message' => $data['message'],
            ]);
        } catch (\Exception $exception) {
            throw new Exception($exception);
        }
    }

    public function delete(Contact $contact)
    {
        try {
            return $contact->delete();
        } catch (\Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
