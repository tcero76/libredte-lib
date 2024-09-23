<?php

declare(strict_types=1);

/**
 * LibreDTE: Biblioteca Estándar en PHP (Núcleo).
 * Copyright (C) LibreDTE <https://www.libredte.cl>
 *
 * Este programa es software libre: usted puede redistribuirlo y/o modificarlo
 * bajo los términos de la Licencia Pública General Affero de GNU publicada por
 * la Fundación para el Software Libre, ya sea la versión 3 de la Licencia, o
 * (a su elección) cualquier versión posterior de la misma.
 *
 * Este programa se distribuye con la esperanza de que sea útil, pero SIN
 * GARANTÍA ALGUNA; ni siquiera la garantía implícita MERCANTIL o de APTITUD
 * PARA UN PROPÓSITO DETERMINADO. Consulte los detalles de la Licencia Pública
 * General Affero de GNU para obtener una información más detallada.
 *
 * Debería haber recibido una copia de la Licencia Pública General Affero de
 * GNU junto a este programa.
 *
 * En caso contrario, consulte <http://www.gnu.org/licenses/agpl.html>.
 */

namespace libredte\lib\Tests\Functional\Repository;

use libredte\lib\Core\Repository\DocumentoTipoRepository;
use libredte\lib\Core\Service\ArrayDataProvider;
use libredte\lib\Core\Service\PathManager;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(DocumentoTipoRepository::class)]
#[CoversClass(ArrayDataProvider::class)]
#[CoversClass(PathManager::class)]
class DocumentoTipoRepositoryTest extends TestCase
{
    private DocumentoTipoRepository $repository;

    protected function setUp(): void
    {
        $this->repository = new DocumentoTipoRepository();
    }

    public function testGetDatosDocumentos(): void
    {
        $documento = $this->repository->getData(33);
        $this->assertEquals('Factura electrónica', $documento['nombre']);

        $documento = $this->repository->getData(110);
        $this->assertEquals('Factura de exportación electrónica', $documento['nombre']);
    }

    public function testCountDocumentos(): void
    {
        $documentos = $this->repository->getDocumentos();
        $this->assertEquals(67, count($documentos));
    }

    public function testCountDocumentosTributarios(): void
    {
        $documentos = $this->repository->getDocumentosTributarios();
        $this->assertEquals(33, count($documentos));
    }

    public function testCountDocumentosInformativos(): void
    {
        $documentos = $this->repository->getDocumentosInformativos();
        $this->assertEquals(21, count($documentos));
    }

    public function testCountDocumentosTributariosElectronicos(): void
    {
        $documentos = $this->repository->getDocumentosTributariosElectronicos();
        $this->assertEquals(12, count($documentos));
    }

    public function testCountDocumentosTributariosElectronicosCedibles(): void
    {
        $documentos = $this->repository->getDocumentosTributariosElectronicosCedibles();
        $this->assertEquals(5, count($documentos));
    }

    public function testCountDocumentosDisponibles(): void
    {
        $documentos = $this->repository->getDocumentosDisponibles();
        $this->assertEquals(11, count($documentos));
    }
}
