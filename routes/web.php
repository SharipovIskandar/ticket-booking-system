<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketPurchaseController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::get('orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('orders/{id}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');

Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('tickets.show');
Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');


Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

Route::get('/buy-ticket/group', [TicketPurchaseController::class, 'showGroupTicketSelection'])->name('buy-ticket.group');
Route::post('/buy-ticket/group/confirm', [TicketPurchaseController::class, 'confirmGroupPurchase'])->name('buy-ticket.group.confirm');
Route::get('/buy-ticket', [TicketPurchaseController::class, 'showTicketSelection'])->name('buy-ticket.select');
Route::post('/complete-purchase', [TicketPurchaseController::class, 'completePurchase'])->name('buy-ticket.purchase');
