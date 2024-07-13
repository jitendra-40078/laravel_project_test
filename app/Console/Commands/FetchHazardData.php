<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\HazardCount;
use Exception;

class FetchHazardData extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'fetch:hazarddata';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Fetch hazard data and update the database';

  /**
   * Execute the console command.
   */
  public function handle()
  {
    $response = Http::withoutVerifying()->get('https://korea.riaas.ai/api/v2/homepage/hazards/count/all');
    if($response->successful()) {
      $totalHazard = $response->json()['total'];
      $formattedTotalHazard = number_format($totalHazard);

      if( $totalHazard > 0 ){
        try{
          $hazard = new HazardCount();
          $hazard->count = $totalHazard;
          $hazard->formatted_count = $formattedTotalHazard;

          $hazard->save();
          $this->info('Hazard data updated successfully.');
        }
        catch(\Exception $e){
          $this->error('Failed to fetch hazard data.');
        }
      }
    } else {
      $this->error('Failed to fetch hazard data.');
    }
  }
}