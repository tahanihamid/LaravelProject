<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        // Dummy data for the list
        $accounts = [
            ['id' => 1, 'name' => 'User 1', 'type' => 'Checking', 'balance' => 4500.00, 'currency' => 'USD'],
            ['id' => 2, 'name' => 'User 2', 'type' => 'Savings', 'balance' => 12500.50, 'currency' => 'USD'],
            ['id' => 3, 'name' => 'Corporate Account', 'type' => 'Business', 'balance' => 85000.25, 'currency' => 'USD']
        ];

        return view('accounts.index', compact('accounts'));
    }

    public function show($id)
    {
        // Find specific account
        $accounts = [
            1 => ['name' => 'User 1', 'type' => 'Checking', 'balance' => 4500.00, 'currency' => 'USD'],
            2 => ['name' => 'User 2', 'type' => 'Savings', 'balance' => 12500.50, 'currency' => 'USD'],
        ];

        $account = $accounts[$id] ?? null;

        return view('accounts.show', compact('account'));
    }

    // CRUD methods
    public function create()
    {
        // Show create form
        return view('accounts.create');
    }

    public function store(Request $request)
    {
        // Handle new account creation
        $accountName = $request->input('account_name');
        
        return redirect()->route('accounts.index')->with('success', 'Account created: ' . $accountName);
    }

    public function edit($id)
    {
        // Show edit form
        return view('accounts.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
      // Update existing account
        return redirect()->route('accounts.index')->with('success', 'Account updated successfully');
    }

    public function destroy($id)
    {
         // Remove account record
        return redirect()->route('accounts.index')->with('success', 'Account deleted');
    }
}