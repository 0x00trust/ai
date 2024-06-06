<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AiModel;
use App\Helpers\Classes\Helper;

class ApiCostController extends Controller
{
	public function index()
	{
		$aiModels = AiModel::with('tokens')->where('is_active', true)->get();
		$groupedAiModels = $aiModels->groupBy('ai_engine');
		return view('panel.admin.finance.api-cost.index', compact('groupedAiModels'));
	}
	public function update(Request $request)
	{
		if (Helper::appIsDemo()) {
            return redirect()->back()->with(['message' => __('This feature is disabled in Demo version.'), 'type' => 'error']);
        }
		$data = $request->except('_token');
		foreach ($data as $aiModelId => $costPerToken) {
			$aiModel = AiModel::findOrFail($aiModelId);
			$aiModel->tokens()->update(['cost_per_token' => $costPerToken]);
		}
		return redirect()->route('dashboard.admin.finance.api-cost-management.index');
	}
}