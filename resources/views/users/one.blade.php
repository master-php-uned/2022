<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>

    </style>
</head>
<body>
    <h1 class="text-2xl text-center mt-10 underline">Usuario</h1>
    <div class="flex flex-col mt-10">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
          <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
              <thead class="bg-gray-100 ">
                <tr>
                  <th class="px-6 py-3 border-b border-gray-200  text-center text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                    Nombre
                  </th>
                  <th class="px-6 py-3 border-b border-gray-200  text-center text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                      Correo Eléctronico
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200  text-center text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                        Tipo de usuario
                  </th>
                  <th class="px-6 py-3 border-b border-gray-200  text-center text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                      # Identificador
                    </th>
                </tr>
            </thead>
              <tbody class="bg-white">
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="flex items-center">

                            <div class="ml-4">
                                <div class="text-sm leading-5 font-medium text-gray-900">{{ $user->name }} </div>
                  </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                    {{ $user->email }}
                </span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                <a
                href=""
                class="text-gray-500 hover:text-gray-600"
                >{{ $user->type->type }}</a>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                <div class="text-sm text-center leading-5 font-medium text-gray-900">{{ $user->id }} </div>
            </td>
            </tr>
        </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
