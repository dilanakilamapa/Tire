<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartData extends Controller
{
    public function index(){
        
        //No of Unloading for a given day
        $CNT_Unloading = DB::select("SELECT COUNT(1) AS CNT FROM FlowFUSHeader WHERE CONVERT(DATE, UDate) = CONVERT(DATE, '2023-02-28') AND Status <> 2;");

        //No of Unloading so far
        $UnloadingWeek = DB::select("SELECT CONVERT(DATE, UDate) AS Day, COUNT(1) AS CNT FROM FlowFUSHeader WHERE Status <> 2 AND UDate >= DATEADD(WEEK, -1, '2023-02-28') AND UDate <= '2023-02-28' GROUP BY CONVERT(DATE, UDate) ORDER BY CONVERT(DATE, UDate);");

        $UnloadingWeekLabels = [];
        $UnloadingWeekData = [];

        foreach ($UnloadingWeek as $order) {
            $UnloadingWeekData[] = $order->CNT;
            $UnloadingWeekLabels[] =$order->Day;
        }

        //No of Unloading so far
        $CNT_Unloading_so_far = DB::select("SELECT COUNT(1) as CNT from FlowFUSHeader where status <> 2");

        //Unloading  group by Year
        $Unloading_year = DB::select("SELECT YEAR(UDate) AS Year, COUNT(1) AS CNT
        FROM FlowFUSHeader
        WHERE status <> 2
        GROUP BY YEAR(UDate)
        ORDER BY YEAR(UDate) ASC;");

        $UnloadingYearLabels = [];
        $UnloadingYearData = [];

        foreach ($Unloading_year as $order) {
            $UnloadingYearData[] = $order->CNT;
            $UnloadingYearLabels[] =$order->Year;
        }

 //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        
        //No of FRN for a given day
        $CNT_FrnGivenDay = DB::select("SELECT COUNT(1) AS CNT FROM FlowFRN WHERE FRNDate = CAST('2023-02-28' AS DATE) AND Status <> 2;");

        //No of FRN so far 
        $FRNweek = DB::select("SELECT CONVERT(DATE, FRNDate) AS Day, COUNT(1) AS CNT FROM FlowFRN WHERE Status <> 2 AND FRNDate >= DATEADD(WEEK, -1, '2023-02-28') AND FRNDate <= '2023-02-28' GROUP BY CONVERT(DATE, FRNDate) ORDER BY CONVERT(DATE, FRNDate);");

        $FRNweekLabels = [];
        $FRNweekData = [];

        foreach ($FRNweek as $order) {
            $FRNweekData[] = $order->CNT;
            $FRNweekLabels[] =$order->Day;
        }
        
        //No of FRN so far 
        $CNT_FRN_so_far = DB::select("SELECT COUNT(1) as CNT from FlowFRN where Status <> 2");
        //No of FRN by Year
        $FrnYear = DB::select("SELECT YEAR(FRNDate) AS YEAR, COUNT(1) AS CNT
        FROM FlowFRN
        WHERE Status <> 2
        GROUP BY YEAR(FRNDate)
        ORDER BY YEAR(FRNDate) ASC;");

        $FRNYearLabels = [];
        $FRNYearkData = [];

        foreach ($FrnYear as $order) {
            $FRNYearkData[] = $order->CNT;
            $FRNYearLabels[] =$order->YEAR;
        }

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
       
        //No of Lots for a given day
        $CNT_No_of_Lots_Day = DB::select("SELECT COUNT(1) AS CNT FROM FlowLOTHeader WHERE LotDate = CONVERT(date, '2023-02-28') AND Status <> 2;");

        //No of Lots so far last week
        $No_of_LotsWeek = DB::select("SELECT CONVERT(DATE, LotDate) AS Day, COUNT(1) AS CNT FROM FlowLOTHeader WHERE Status <> 2 AND LotDate >= DATEADD(WEEK, -1, '2023-02-28') AND LotDate <= '2023-02-28' GROUP BY CONVERT(DATE, LotDate) ORDER BY CONVERT(DATE, LotDate);");

        $No_of_LotsWeekLabels = [];
        $No_of_LotsWeekData = [];

        foreach ($No_of_LotsWeek as $order) {
            $No_of_LotsWeekData[] = $order->CNT;
            $No_of_LotsWeekLabels[] =$order->Day;
        }

        //No of Lots so far
        $CNT_Lots_so_far = DB::select("SELECT COUNT(1) as CNT from FlowLOTHeader where Status <> 2 ");

        //No of Lots so far by year
        $No_of_LotsYear = DB::select("SELECT YEAR(LotDate) AS Year, COUNT(1) AS CNT
        FROM FlowLOTHeader
        WHERE Status <> 2
        GROUP BY YEAR(LotDate);");

        $No_of_LotsYearLabels = [];
        $No_of_LotsYearData = [];

        foreach ($No_of_LotsYear as $order) {
            $No_of_LotsYearData[] = $order->CNT;
            $No_of_LotsYearLabels[] =$order->Year;
        }

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        
        //No of Jobs created for a given day
        $CTN_No_of_Jobs = DB::select("SELECT COUNT(1) AS CNT FROM FlowIssuedForSewing WHERE Status <> 2 AND CreatedDate >= CONVERT(DATE, '2023-02-28') AND CreatedDate < DATEADD(DAY, 1, CONVERT(DATE, '2023-02-28'));");

        //No of Jobs created so far 
        $No_of_JobsWeek = DB::select("SELECT CONVERT(DATE, CreatedDate) AS Day, COUNT(1) AS CNT FROM FlowIssuedForSewing WHERE Status <> 2 AND CreatedDate >= DATEADD(WEEK, -1, '2023-02-28') AND CreatedDate <= '2023-02-28' GROUP BY CONVERT(DATE, CreatedDate) ORDER BY CONVERT(DATE, CreatedDate);");

        $No_of_JobsWeekLabels = [];
        $No_of_JobsWeekData = [];

        foreach ($No_of_JobsWeek as $order) {
            $No_of_JobsWeekData[] = $order->CNT;
            $No_of_JobsWeekLabels[] =$order->Day;
        }

        //No of Jobs created so far 
        $CTN_No_of_Jobs_so_far = DB::select("SELECT COUNT(1) as CNT from FlowIssuedForSewing where Status <> 2");
        
        //No of Jobs created so far Group by Year
        $No_of_JobsYear = DB::select ("SELECT YEAR(CreatedDate) AS Year, COUNT(1) AS CNT
        FROM FlowIssuedForSewing
        WHERE Status <> 2
        GROUP BY YEAR(CreatedDate);");

        $No_of_JobsYearLabels = [];
        $No_of_JobsYearData = [];

        foreach ($No_of_JobsYear as $order) {
            $No_of_JobsYearData[] = $order->CNT;
            $No_of_JobsYearLabels[] =$order->Year;
        }
        
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        
        //No of Ledger items created Store wise for given day
        $Ledger_items =  DB::select("SELECT s.StoreName, COUNT(1) as CNT FROM ItemLedger as il JOIN [BOS_STAR].[dbo].[Store] as s ON il.StoreID = s.ID WHERE CONVERT(DATE, il.TrDate) = CONVERT(DATE, '2023-02-28') AND il.status <> 2 GROUP BY il.StoreID, s.StoreName ORDER BY il.StoreID;");

        $Ledger_itemsLabels = [];
        $Ledger_itemsData = [];

        foreach ($Ledger_items as $order) {
            $Ledger_itemsData[] = $order->CNT;
            $Ledger_itemsLabels[] =$order->StoreName;
        }

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        
        //No of Ledger Items created Store wise so far
        $Ledger_items_far = DB::select("SELECT i.StoreID, s.StoreName, COUNT(1) AS CNT FROM ItemLedger AS i JOIN Store AS s ON i.StoreID = s.ID WHERE i.Status <> 2 GROUP BY i.StoreID, s.StoreName ORDER BY i.StoreID;");

        $Ledger_items_farLabels = [];
        $Ledger_items_farData = [];

        foreach ($Ledger_items_far as $order) {
            $Ledger_items_farData[] = $order->CNT;
            $Ledger_items_farLabels[] =$order->StoreName;
        }

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
       
        //No of Ledger items created Bill Type wise for given day
        $No_of_Ledger_items = DB::select("SELECT DISTINCT UPPER(LEFT(Reference, 3)) AS BillType, COUNT(1) AS CNT FROM ItemLedger WHERE CAST(TrDate AS DATE) = CAST('2023-02-28' AS DATE) AND status <> 2 GROUP BY LEFT(Reference, 3);");

        $No_of_Ledger_itemsLabels = [];
        $No_of_Ledger_itemsData = [];

        foreach ($No_of_Ledger_items as $order) {
            $No_of_Ledger_itemsData[] = $order->CNT;
            $No_of_Ledger_itemsLabels[] =$order->BillType;
        }

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        return response()->json([
            'CNT_Unloading' => $CNT_Unloading,
            'UnloadingWeekLabels' => $UnloadingWeekLabels,
            'UnloadingWeekData' => $UnloadingWeekData,

            'CNT_Unloading_so_far' => $CNT_Unloading_so_far,
            'UnloadingYearLabels' => $UnloadingYearLabels,
            'UnloadingYearData' => $UnloadingYearData,

            'CNT_FrnGivenDay' => $CNT_FrnGivenDay,
            'FRNweekLabels' => $FRNweekLabels,
            'FRNweekData' => $FRNweekData,

            'CNT_FRN_so_far' => $CNT_FRN_so_far,
            'FRNYearLabels' => $FRNYearLabels,
            'FRNYearkData' => $FRNYearkData,

            'CNT_No_of_Lots_Day' => $CNT_No_of_Lots_Day,
            'No_of_LotsWeekLabels' => $No_of_LotsWeekLabels,
            'No_of_LotsWeekData' => $No_of_LotsWeekData,

            'CNT_Lots_so_far' => $CNT_Lots_so_far,
            'No_of_LotsYearLabels' => $No_of_LotsYearLabels,
            'No_of_LotsYearData' => $No_of_LotsYearData,

            'CTN_No_of_Jobs' => $CTN_No_of_Jobs,
            'No_of_JobsWeekLabels' => $No_of_JobsWeekLabels,
            'No_of_JobsWeekData' => $No_of_JobsWeekData,

            'CTN_No_of_Jobs_so_far' => $CTN_No_of_Jobs_so_far,
            'No_of_JobsYearLabels' => $No_of_JobsYearLabels,
            'No_of_JobsYearData' => $No_of_JobsYearData,

            'Ledger_items' => $Ledger_items,
            'Ledger_itemsLabels' => $Ledger_itemsLabels,
            'Ledger_itemsData' => $Ledger_itemsData,

            'Ledger_items_far' => $Ledger_items_far,
            'Ledger_items_farLabels' => $Ledger_items_farLabels,
            'Ledger_items_farData' => $Ledger_items_farData,

            'No_of_Ledger_items' => $No_of_Ledger_items,
            'No_of_Ledger_itemsLabels' => $No_of_Ledger_itemsLabels,
            'No_of_Ledger_itemsData' => $No_of_Ledger_itemsData,
            
        ]);

    }

}