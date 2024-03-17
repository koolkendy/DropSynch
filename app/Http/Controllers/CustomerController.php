<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;

class CustomerController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('customers.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(StoreCustomerRequest $request)
    {
        $user = User::create($request->all());

        /**
         * Handle upload an image
         */
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

            $file->storeAs('customers/', $filename, 'public');
            $user->update([
                'photo' => $filename
            ]);
        }

        return redirect()
            ->route('customers.index')
            ->with('success', 'New customer has been created!');
    }

    public function show(User $user)
    {
        $user->loadMissing(['quotations', 'orders'])->get();

        return view('customers.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('customers.edit', [
            'user' => $user
        ]);
    }

    public function update(UpdateCustomerRequest $request, User $user)
    {
        //
        $user->update($request->except('photo'));

        if ($request->hasFile('photo')) {

            // Delete Old Photo
            if ($user->photo) {
                unlink(public_path('storage/customers/') . $user->photo);
            }

            // Prepare New Photo
            $file = $request->file('photo');
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

            // Store an image to Storage
            $file->storeAs('customers/', $fileName, 'public');

            // Save DB
            $user->update([
                'photo' => $fileName
            ]);
        }

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer has been updated!');
    }

    public function destroy(User $user)
    {
        if ($user->photo) {
            unlink(public_path('storage/customers/') . $user->photo);
        }

        $user->delete();

        return redirect()
            ->back()
            ->with('success', 'Customer has been deleted!');
    }
}
