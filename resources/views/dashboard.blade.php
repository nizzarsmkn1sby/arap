@extends('layouts.app')

@section('title', 'Dasbor | ARAP POS')

@section('content')
<div class="page-header">
    <div class="page-title">
        <h1>Ringkasan Operasional</h1>
        <p>Selamat datang kembali, {{ auth()->user()->name }}! Berikut adalah ikhtisar bisnis Anda hari ini.</p>
    </div>
    <div>
        <div style="background: var(--primary-light); color: var(--primary); padding: 8px 16px; border-radius: 12px; font-weight: 700; font-size: 12px; border: 1px solid var(--primary);">
            LEVEL AKSES: {{ strtoupper(auth()->user()->role->name) }}
        </div>
    </div>
</div>

@if(auth()->user()->isOwner())
<div class="grid grid-3" style="margin-bottom: 40px;">
    <div class="card" style="background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); color: white; border: none;">
        <div style="font-size: 14px; opacity: 0.8; margin-bottom: 8px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Pendapatan Hari Ini</div>
        <div style="font-size: 32px; font-weight: 800;">Rp {{ number_format($todaySales ?? 0, 0, ',', '.') }}</div>
    </div>
    
    <div class="card">
        <div style="font-size: 14px; color: var(--text-muted); margin-bottom: 8px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Total Transaksi</div>
        <div style="font-size: 32px; font-weight: 800; color: var(--primary);">{{ $todayTransactions ?? 0 }}</div>
    </div>
    
    <div class="card">
        <div style="font-size: 14px; color: var(--text-muted); margin-bottom: 8px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Stok Inventaris</div>
        <div style="font-size: 32px; font-weight: 800; color: var(--primary);">{{ $totalProducts ?? 0 }}</div>
    </div>
</div>
@endif

<div class="grid grid-2">
    <!-- Quick Actions -->
    @if(auth()->user()->isOwner() || auth()->user()->isCashier())
    <div class="card" style="text-align: center; cursor: pointer; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 250px;" onclick="window.location='{{ route('pos.index') }}'">
        <div style="font-size: 56px; margin-bottom: 20px;">💻</div>
        <h3 style="color: #fff; margin-bottom: 12px; font-weight: 800; letter-spacing: -0.5px; text-transform: uppercase;">TERMINAL KASIR</h3>
        <p style="color: var(--text-muted); font-size: 14px; max-width: 300px;">Buka antarmuka penjualan untuk memproses transaksi pelanggan baru.</p>
        <div class="btn btn-primary" style="margin-top: 25px; padding: 12px 30px;">Luncurkan Sekarang</div>
    </div>
    @endif

    @if(auth()->user()->isOwner())
    <div class="card" style="text-align: center; cursor: pointer; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 250px;" onclick="window.location='{{ route('products.index') }}'">
        <div style="font-size: 56px; margin-bottom: 20px;">🛠️</div>
        <h3 style="color: #fff; margin-bottom: 12px; font-weight: 800; letter-spacing: -0.5px; text-transform: uppercase;">KONTROL INVENTARIS</h3>
        <p style="color: var(--text-muted); font-size: 14px; max-width: 300px;">Kelola tingkat stok, penyesuaian harga, dan spesifikasi produk Anda.</p>
        <div class="btn" style="margin-top: 25px; padding: 12px 30px; border: 1px solid var(--border); color: #fff;">Manajemen Produk</div>
    </div>
    @endif
</div>
@endsection
