<?php

namespace App\Livewire;

use App\Models\Santri;
use App\Models\StatusSantri;
use App\Models\TahunBerjalan;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class CekSantri extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public $ceknism = '';

    public function ceknismsantri()
    {
        $ceknism = Santri::where('nism', $this->ceknism)
            ->count();

        if ($ceknism == 0) {
            throw ValidationException::withMessages([
                'ceknism' => trans('auth.nismtidakditemukan'),
            ]);
        } elseif ($ceknism != 0) {
            throw ValidationException::withMessages([
                'ceknism' => trans('auth.nismditemukan'),
            ]);
        }
    }

    public function table(Table $table): Table
    {

        return $table
            ->query(Santri::where('nism', $this->ceknism))
            ->columns([
                Stack::make([

                    TextColumn::make('nama_lengkap')
                        ->label('Nama')
                        ->grow(false)
                        // ->description(new HtmlString('<br><strong>Nama:</strong>'), position: 'above')
                        ->size(TextColumn\TextColumnSize::Large)
                        ->weight(FontWeight::Bold),

                    TextColumn::make('status')
                        ->label('Status')
                        ->grow(false)
                        // ->description(fn($record): string => "Status:", position: 'above')
                        // ->description(new HtmlString('<br><strong>Status:</strong>'), position: 'above')
                        ->size(TextColumn\TextColumnSize::Large)
                        ->weight(FontWeight::Bold)
                        ->html()
                        ->default(function ($record) {
                            $getstatussantri = StatusSantri::where('id', $record->id)->first();

                            if ($getstatussantri?->stat_santri_id == 3) {
                                return 'Aktif';
                            } elseif ($getstatussantri?->stat_santri_id != 3) {
                                return 'Tidak Aktif';
                            }
                        })
                        ->color(function ($record) {
                            $getstatussantri = StatusSantri::where('id', $record->id)->first();

                            if ($getstatussantri?->stat_santri_id == 3) {
                                return 'tsn-bg-header';
                            } elseif ($getstatussantri?->stat_santri_id != 3) {
                                return 'tsn-bg-accent';
                            }
                        })
                        ->icon(function ($record) {
                            $getstatussantri = StatusSantri::where('id', $record->id)->first();

                            if ($getstatussantri?->stat_santri_id == 3) {
                                return 'heroicon-o-check-circle';
                            } elseif ($getstatussantri?->stat_santri_id != 3) {
                                return 'heroicon-o-x-circle';
                            }
                        }),

                    TextColumn::make('nik')
                        ->label('NIK')
                        ->grow(false)
                        ->description(new HtmlString('<br><strong>NIK:</strong>'), position: 'above'),

                    TextColumn::make('nism')
                        ->label('NISM')
                        ->grow(false)
                        ->description(new HtmlString('<br><strong>NISM:</strong>'), position: 'above'),

                    TextColumn::make('tempat_lahir')
                        ->label('Tempat Lahir')
                        ->grow(false)
                        ->description(new HtmlString('<br><strong>Tempat Lahir:</strong>'), position: 'above'),

                    TextColumn::make('tanggal_lahir')
                        ->label('Tanggal Lahir')
                        // ->date('d M Y')
                        ->grow(false)
                        ->description(new HtmlString('<br><strong>Tanggal Lahir:</strong>'), position: 'above'),

                    TextColumn::make('walisantri.ik_nama_lengkap')
                        ->label('Nama Ibu')
                        ->grow(false)
                        ->description(new HtmlString('<br><strong>Nama Ibu Kandung:</strong>'), position: 'above'),


                ])

            ])
            ->actions([])
            ->paginated(false)
            ->emptyStateIcon('heroicon-o-arrow-up')
            ->emptyStateHeading('Klik Tombol CEK');
    }

    public function render()
    {

        $data = Santri::where('nism', $this->ceknism);

        return view('livewire.cek-santri', [
            'data' => $data,
        ]);
    }
}
