<?php

namespace App\Http\Controllers;

use App\Mail\OrderCompleteMail;
use App\Mail\OrderMail;
use App\ManageOrder;
use App\Order;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\MediaLibrary\Support\MediaStream;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;


class DashboardController extends Controller
{
    // Dashboard - Analytics
    public function dashboardAnalytics()
    {
        return view(ADMIN_RESOURCE . 'dashboard');
    }

    public function users()
    {
        return view(ADMIN_RESOURCE . 'users');
    }

    public function usersList()
    {
        return Datatables::of(User::query()->where('id', '!=', auth()->user()->id))
        ->addColumn('action', function ($user) {
            $deleteUrl = "'" . route('user.destroy', $user->id) . "'";
            return '<div class="btn-group " role="group">
                        <a class="p-0-6" role="button" onclick="confirmDelete(' . $deleteUrl . ',this)"><i class="feather icon-trash-2 h4 text-danger"></i></a>
                    </div>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function digitizingListView()
    {
        return view(ADMIN_RESOURCE . 'digitizingList');
    }

    public function digitizingList()
    {
        $filter = [['user_id', auth()->user()->id], ['type', 0]];

        if (auth()->user()->email == env('MANAGE_ORDER_EMAIL')
        ) {
            $filter = [['type', 0]];
        }

        $query = Order::query()
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->where($filter)
            ->select('orders.*', 'users.name as user_name');

        return DataTables::of($query)
            ->addColumn('formatted_created_at', function ($item) {
                // Format the created_at date
                return $item->created_at->format('d-M-y h:i A');
            })
            ->addColumn('action', function ($item) {
                $deleteUrl = "'" . route('order.destroy', $item->id) . "'";
                $editUrl = route('digitizing-order.edit', $item->id);
                $orderFiles = ManageOrder::where('order_id', $item->id)->first();

                $orderFilesLink = "";
                if ($orderFiles) {
                    $downloadFileUrl = route('download.ordered.files', Crypt::encrypt($orderFiles->id));
                    $orderFilesLink = '<a class="p-0-6" role="button" href="' . $downloadFileUrl . '"><i class="feather icon-download h4 text-primary"></i></a>';
                }

                return '<div class="btn-group" role="group">
                        ' . $orderFilesLink . '
                        <a class="p-0-6" role="button" href="' . $editUrl . '"><i class="feather icon-edit h4 text-success"></i></a>
                        <a class="p-0-6" role="button" onclick="confirmDelete(' . $deleteUrl . ',this)"><i class="feather icon-trash-2 h4 text-danger"></i></a>
                    </div>';
            })
            ->addColumn('is_urgent', function ($item) {
                return unserialize(PROJECT_URGENT_ARRAY)[$item->is_urgent];
            })
            ->addColumn('type', function ($item) {
                return unserialize(PROJECT_TYPE_ARRAY)[$item->type];
            })
            ->rawColumns(['is_urgent', 'type', 'action'])->make(true);
    }

    public function vectorListView()
    {
        return view(ADMIN_RESOURCE . 'vectorList');
    }

    public function vectorList(){
        $filter = [['user_id', auth()->user()->id], ['type', 1]];

        if (auth()->user()->email == env('MANAGE_ORDER_EMAIL')) 
        {
            $filter = [['type', 1]];
        }

        $query = Order::query()
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->where($filter)
            ->select('orders.*', 'users.name as user_name');

        return DataTables::of($query)
            ->addColumn('formatted_created_at', function ($item) {
                // Format the created_at date
                return $item->created_at->format('d-M-y h:i A');
            })
            ->addColumn('action', function ($item) {
                $deleteUrl = "'" . route('order.destroy', $item->id) . "'";
                $editUrl = route('vector-order.edit', $item->id);
                $orderFiles = ManageOrder::where('order_id', $item->id)->first();

                $orderFilesLink = "";
                if ($orderFiles) {
                    $downloadFileUrl = route('download.ordered.files', Crypt::encrypt($orderFiles->id));
                    $orderFilesLink = '<a class="p-0-6" role="button" href="' . $downloadFileUrl . '"><i class="feather icon-download h4 text-primary"></i></a>';
                }

                return '<div class="btn-group" role="group">
                        ' . $orderFilesLink . '
                        <a class="p-0-6" role="button" href="' . $editUrl . '"><i class="feather icon-edit h4 text-success"></i></a>
                        <a class="p-0-6" role="button" onclick="confirmDelete(' . $deleteUrl . ',this)"><i class="feather icon-trash-2 h4 text-danger"></i></a>
                    </div>';
            })
            ->addColumn('is_urgent', function ($item) {
                return unserialize(PROJECT_URGENT_ARRAY)[$item->is_urgent];
            })
            ->addColumn('type', function ($item) {
                return unserialize(PROJECT_TYPE_ARRAY)[$item->type];
            })
            ->rawColumns(['is_urgent', 'type', 'action'])->make(true);
    }

    public function editVectorOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->instructions .= "\n---------------------Updated Instructions---------------------\n";
        return view(ADMIN_RESOURCE . 'vector', compact('order'));
    }

    public function editDigitizingOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->instructions .= "\n---------------------Updated Instructions---------------------\n";
        return view(ADMIN_RESOURCE . 'digitizing', compact('order'));
    }

    public function destroyOrder($id)
    {
        $status =  Order::findOrFail($id)->delete();
        return response()->json(['status' => $status]);
    }

    public function destroyUser($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return response()->json(['success' => 'User deleted successfully']);
        } catch (ModelNotFoundException $e) {
            Log::error("User not found with ID: $id");
            return response()->json(['error' => 'User not found'], 404);
        } catch (\Exception $e) {
            Log::error("An error occurred while deleting the user with ID: $id. Error: " . $e->getMessage());
            return response()->json(['error' => 'An error occurred while deleting the user'], 500);
        }
    }

    public function showVectorForm()
    {
        return view(ADMIN_RESOURCE . 'vector');
    }

    public function showDigitizingForm()
    {
        return view(ADMIN_RESOURCE . 'digitizing');
    }

    public function completeOrder(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id'
            // 'document' => 'required|array',
            // 'document.*' => 'file|mimes:jpg,jpeg,png,pdf|max:10240', // adjust file types and size as needed
        ]);

        $order = Order::find($request->order_id);
        $order->status = 1;
        $order->save();
        $request->request->add(['type' => $order->type]);

        ManageOrder::where('order_id', $request->order_id)->delete();

        $manageOrder = ManageOrder::create($request->all());

        if ($manageOrder->getFirstMedia()) {
            $manageOrder->delete();
        }


        foreach ($request->input('document', []) as $file) {
            $manageOrder->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');
        }

        if ($manageOrder) {
            Mail::to($order->user->email)->send(new OrderCompleteMail($manageOrder));
        }

        return back()->with('success', 'Files Uploaded.');
    }

    public function manageOrdersShow()
    {
        $orders = Order::orderBy('id', 'DESC')->get();
        return view(ADMIN_RESOURCE . 'ordersManagement', compact('orders'));
    }

    public function placeOrder(Request $request)
    {
        if (!$request->has('is_urgent')) {
            $request->request->add(['is_urgent' => 0]);
        }
        // $request->request->add(['order_no' => date('Y')]); 
        $order = Order::create($request->all());

        $manageOrder = ManageOrder::create([
            'type' => $order->type,
            'order_id' => $order->id,
        ]);

        foreach ($request->input('document', []) as $file) {
            $order->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');
        }

        if ($order) {
            Mail::to(env('ORDER_EMAIL'))->send(new OrderMail($order));
        }

        if ($order) {
            return redirect()->route('portal.dashboard')->with('success', 'Order Placed Succwssfully!');
        }
    }

    public function updateOrder(Request $request, $id)
    {

        if (!$request->has('is_urgent')) {
            $request->request->add(['is_urgent' => 0]);
        }

        $order = Order::findOrFail($id);
        $order->update($request->all());

        if (count($order->getMedia('document')) > 0) {
            foreach ($order->getMedia('document') as $media) {
                if (!in_array($media->file_name, $request->input('document', []))) {
                    $media->delete();
                }
            }
        }

        $media = $order->getMedia('document')->pluck('file_name')->toArray();

        foreach ($request->input('document', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $order->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');
            }
        }

        if ($order) {
            Mail::to(env('ORDER_EMAIL'))->send(new OrderMail($order));
        }

        $view = $order->type ? 'vectorListView' : 'digitizingListView';
        return redirect()->route($view)->with('success', 'Order Updated Successfully!');
    }

    public function storeMedia(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function downloadFiles($orderId)
    {
        try {
            $id = Crypt::decrypt($orderId);
            $order = Order::findOrFail($id);

            // Let's get some media.
            $downloads = $order->getMedia('document');
            $fileName = $order->type ? 'vector' : 'digitizing';

            // Download the files associated with the media in a streamed way.
            // No prob if your files are very large.
            return MediaStream::create($fileName . '-order-0' . $order->id . '.zip')->addMedia($downloads);
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    // Admin Download File
    public function downloadOrderedFiles($orderId)
    {
        try {
            $id = Crypt::decrypt($orderId);
            $order = ManageOrder::findOrFail($id);

            // Let's get some media.
            $downloads = $order->getMedia('document');
            $fileName = $order->type ? 'vector' : 'digitizing';

            // dd($id, $uploadOrderId, $order, $downloads);

            // Download the files associated with the media in a streamed way.
            // No prob if your files are very large.
            if ($downloads) {
                return MediaStream::create($fileName . '-order-0' . $order->id . '.zip')->addMedia($downloads);
            } else {
                return "File Not Found";
            }
        } catch (DecryptException $e) {
            return abort(404);
        }
    }
}
